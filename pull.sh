while true; do
	git pull origin main
	composer install --ignore-platform-reqs
	php artisan serve
	sleep 30
done
