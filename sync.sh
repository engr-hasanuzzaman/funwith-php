#!/bin/bash
rsync -avu --delete --exclude='.git/' --exclude='*.sh' /home/hasan/projects/funwith-php/ /var/www/html/