
🚀  Setup Instructions:
1. Clone the project: git clone git@github.com:cahutayxander/Adaca_TodoAPI.git
2. Install Docker Desktop. Laravel Sail runs on Docker, so you need Docker installed on your system.
    - Download Docker Desktop compatible with your machine here https://www.docker.com/products/docker-desktop/
3. Install Composer dependencies using Docker. Navigate to the project root(directory). Go to the directory where you cloned the project — this should be the same directory that contains files like composer.json, artisan, and the app/ folder. Then run the command below without (-).
    - docker run --rm -v $(pwd):/app -w /app composer install


▶️ How to run project:
1. Open Docker Desktop
    - Ensure Docker Desktop is running since Laravel Sail containers depend on it.
2. Copy the .env file. Run without (-)
    - cp .env.example .env
3. Start Laravel Sail to boot up the development environment.
    - ./vendor/bin/sail up
4. When you're done, you can stop the running Sail containers with
    - ./vendor/bin/sail stop


✅ How to Verify if the Application is Running
1. Open Postman and click the Import button in the top-left corner.
2. Select the Link tab, then paste the collection link https://api.postman.com/collections/15758258-31c0f49c-a42e-4c66-a6ef-633bf7e59465?access_key=PMAT-01JZS34GXQK14B2389T0J0E4JM
3. Import the collection
4. Use the /todos API endpoint from the imported collection to fetch the todo list.
    - If you receive a list of todos, your project setup is successful!
