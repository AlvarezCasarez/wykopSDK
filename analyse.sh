#!/usr/bin/env bash

cp phpstan.neon.dist phpstan.neon
cp phpcs.xml.dist phpcs.xml
cp phpmd.xml.dist phpmd.xml

echo "Running PHP Code Sniffer..."
./vendor/bin/phpcs
echo ""

echo "Running PHP Mess Detector..."
./vendor/bin/phpmd ./tests/,./src text ./phpmd.xml
echo ""

echo "Running PHP Stan..."
./vendor/bin/phpstan.phar analyse -l 5 -c ./phpstan.neon --no-progress ./tests/
echo ""

echo "Running PHP Copy-Paste Detector..."
./vendor/bin/phpcpd src
echo ""

echo "Running PHP Magic Numbers Detector..."
./vendor/bin/phpmnd ./src
echo ""

echo "Running PHP-CS-Fixer..."
./vendor/bin/php-cs-fixer fix --dry-run --diff --diff-format=udiff --show-progress=dots --config=./.php_cs.config -v ./src
echo ""
