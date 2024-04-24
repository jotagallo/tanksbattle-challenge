#!/bin/bash
echo -e "\033[1mStarting container setup...\033[0m"
docker compose up -d
echo -e "\033[1mContainer setup completed !\033[0m"
CONTAINER_NAME="tanksbattle_php"
CID=$(docker ps -q -f status=running -f name=^/${CONTAINER_NAME}$)
if [ ! "${CID}" ]; then
  echo "Container is not running. Make sure you docker is up and running, and try again."
else
  echo -e "\033[1mRunning Composer...\033[0m"
  docker exec -it ${CONTAINER_NAME} composer install
  echo -e "\033[1mDependencies installation finished !\033[0m"
  echo -e "\033[0;32mTanksbattle project is ready to go! Visit it on http://localhost/\033[0m"
fi
