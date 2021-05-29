<?php

namespace App\Patterns\Strategy;

use App\Models\User\User;
use App\Patterns\Strategy\Interfaces\SalaryStrategyInterface;
use Illuminate\Support\Collection;

class SalaryManager
{
    private $salaryStrategy;
    private $period;
    private $users;

    public function __construct(array $period, Collection $users)
    {
        $this->period = $period;
        $this->users = $users;
    }

    public function handle()
    {
        // расчет зп
        $usersSalary = $this->calculateSalary();

        $this->saveSalary($usersSalary);

        return $usersSalary;
    }

    private function calculateSalary(): Collection
    {
        $usersSalary = $this->users->map(
            function (User $user) {
                // определяем стратегию расчета для пользователя
                $strategy = $this->getStrategyByUser($user);
                $salary = $this
                    ->setCalculateStrategy($strategy)
                    ->calculateUserSalary($this->period, $user);

                $strategyName = $strategy->getName();
                $userId = $user->id;

                $newItem = compact('userId', 'salary', 'strategyName');

                return $newItem;
            }
        );

        return $usersSalary;
    }

    private function saveSalary(Collection $usersSalary)
    {
        return true;
    }

    // получаем где работает пользователь, и пораждаем
    // соответствующий класс стратегии
    private function getStrategyByUser(User $user): SalaryStrategyInterface
    {
        $strategyName = $user->departmentName() . 'Strategy';
        $strategyClass = __NAMESPACE__ . '\\Strategies\\' . ucwords($strategyName);

        throw_if(!class_exists($strategyClass), \Exception::class,
            "Класс не существует [{$strategyClass}]");

        return new $strategyClass;
    }

    // устанавливаем стратегию, по которой будем расчитывать
    private function setCalculateStrategy(SalaryStrategyInterface $strategy): self
    {
        $this->salaryStrategy = $strategy;

        return $this;
    }

    // устанавливаем стратегию, по которой будем расчитывать
    private function calculateUserSalary($period, $user)
    {
        return $this->salaryStrategy->calc($period, $user);
    }
}
