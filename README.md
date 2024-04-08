# xalok-app
xalok app 
This app is runing with docker it contains a project with laravel 11 , mysql, sail y redis

### INSTALL ###
before check your .env file fou can just copy the content inside of .env.example since I put everything you need over there
all you need to do after you clone the project is use your terminal:

cd xalok-app
composer install
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' 
sail up -d
sail artisan migrate
sail artisan db:seed

sail npm run dev

### JUSTIFICATION ###
once you start the project there shuld be random data into Vehicles and Drivers tables then you can play around with trips.
to create a trip you must select the calendar icon, then pick a date and it will show you automatically the vehicles availables for that date once you choose a car it'll show you the drivers availables for that car and that day. Enjoy!

I decide to use laravel because it give to you a lot of libreries that you can use depend on your needs, as I need to create a CRUD and to help me out to use SOLID principals and CI/CD I am also more familiarized  with this freamwork.

I also decide to make an authenticable app because the requirements dosn't specify if there musht be a inventory of vehicles, so I start makeing the views to create vehicles and drivers then I just find out how to deal with the challenge of trips and I implement bootstrap as frontend freamwork to work whit the forms. I also choose laravel because I feel very confortable working with it since I lerned 5 years ago 