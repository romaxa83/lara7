for WORD in `cat sensor_data.json`
do
   echo $WORD
   curl -XPOST -u sensor_data:sensor_data --header "Content-Type: application/json" "http://192.168.133.1:9600/" -d ''$WORD''
done
