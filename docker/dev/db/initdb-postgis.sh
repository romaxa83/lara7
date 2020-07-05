#!/bin/sh

set -e

# Perform all actions as $POSTGRES_USER
export PGUSER="$POSTGRES_USER"

# add postgrereader user
psql -c "CREATE USER sampleuser WITH PASSWORD 'samplepassword';"

# create databases
psql -c "CREATE DATABASE gis;"

# add extensions to databases
psql gis -c "CREATE EXTENSION IF NOT EXISTS postgis;"
psql gis -c "CREATE EXTENSION IF NOT EXISTS fuzzystrmatch;"
psql gis -c "CREATE EXTENSION IF NOT EXISTS addressing_dictionary;"
