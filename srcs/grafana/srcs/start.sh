#!/bin/bash
(telegraf conf &) && grafana-server --homepath "/usr/share/grafana" start
tail -f /dev/null