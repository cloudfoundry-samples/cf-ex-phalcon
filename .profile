# export database configuration as env variables
# edit `"user-provided"` to be the name of your db provider like `p-mysql`, `p.mysql` or `cleardb`
export DATA_MYSQL_HOST=$(echo "$VCAP_SERVICES" | jq -r '.["user-provided"][].credentials.hostname')
export DATA_MYSQL_USER=$(echo "$VCAP_SERVICES" | jq -r '.["user-provided"][].credentials.username')
export DATA_MYSQL_PASS=$(echo "$VCAP_SERVICES" | jq -r '.["user-provided"][].credentials.password')
export DATA_MYSQL_NAME=$(echo "$VCAP_SERVICES" | jq -r '.["user-provided"][].credentials.name')