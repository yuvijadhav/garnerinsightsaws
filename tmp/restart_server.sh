cloudways_token=$(curl -X POST --header 'Content-Type: application/x-www-form-urlencoded' --header 'Accept: application/json' -d 'email=akhilnair237@gmail.com&api_key=JzF39pqiffFIkhlxAOnpLSsw2cnccS' 'https://api.cloudways.com/api/v1/oauth/access_token' | python3 -c "import sys, json; print(json.load(sys.stdin)['access_token'])")

curl -X POST --header 'Content-Type: application/x-www-form-urlencoded' --header 'Accept: application/json' --header "Authorization: Bearer ${cloudways_token}" -d 'server_id=148481' 'https://api.cloudways.com/api/v1/server/restart'

