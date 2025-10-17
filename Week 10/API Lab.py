import requests

url = "https://safeut.test.med.utah.edu/apidemo/RestService/Quote"
req = requests.get(url)
print("Status code: ", req.status_code)

return_value = req.json()
print(return_value)

# I drink to make other people more interesting.
# I used to think I was indecisive but now I’m not too sure
# Most people work just hard enough not to get fired and get paid just enough money not to quit