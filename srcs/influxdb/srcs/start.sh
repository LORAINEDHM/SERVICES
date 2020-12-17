#!/bin/bash
(telegraf conf &) && influxd run -config /etc/influxdb.conf
tail -f /dev/null