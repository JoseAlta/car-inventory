# xalok-app
xalok app 
This app is runing with docker it contains a project with laravel, mysql, sail y redis

before check your .env file fou can just copy the content inside of .env.example since I put everything you need over there
all you need to do after you clone the project is use your terminal:

cd xalok-app
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail' 
sail up -d
sail artisan migrate
sail artisan db:seed
sail npm build
sail npm run dev

I decide to use laravel because it give to you a lot of libreries that you can use depend on your needs, as I need to create a CRUD and to help me out to use SOLID principals and CI/CD I am also more familiarized  with this freamwork.

I also decide to make an authenticable app because the requirements dosn't specify if there musht be a inventory of vehicles, so I make the views to create vehicles and drivers then I just find out how to deal with the challenge of trips and I implement bootstrap as frontend freamwork