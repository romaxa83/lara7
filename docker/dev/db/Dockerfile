FROM postgres:12

ENV POSTGISV 2.5
ENV TZ Europe/Kiev

# add addressing dictionary
#RUN mkdir -p /opt/apps
#COPY ./pgsql-address-dictionary.zip /opt/apps/pgsql-address-dictionary.zip

RUN apt-get update && apt-get install -y apt-transport-https

RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  postgresql-12-postgis-2.5 \
  postgresql-12-postgis-2.5-scripts \
  postgresql-12-pgrouting \
  postgresql-12-pgrouting-scripts \
  postgresql-server-dev-12 \
  unzip \
  make \
#  && cd /opt/apps \
#  && unzip pgsql-address-dictionary.zip \
#  && cd pgsql-addressing-dictionary-master \
#  && make install \
#  && apt-get purge -y --auto-remove postgresql-server-dev-$PG_MAJOR make unzip

# set time zone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# add bakcup job
#RUN mkdir -p /opt/backups
#COPY ./pgbackup.sh /opt/pgbackup.sh
#RUN chmod +x /opt/pgbackup.sh

# add init script
RUN mkdir -p /docker-entrypoint-initdb.d
COPY ./initdb-postgis.sh /docker-entrypoint-initdb.d/postgis.sh

# create volume for backups
VOLUME ["/opt/backups"]
