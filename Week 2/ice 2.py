# Password Verification
correct_password = "Utes!"

user_password = input("Enter your password: \n")

if user_password == correct_password:
    print("Access Granted")
else:
    print("Access Denied")


# Voting Age
voting_age = 18

user_age = int(input("Enter your age: \n"))

if user_age >= voting_age:
    print("You can vote!")
else:
    years_left = voting_age - user_age
    print(f"You cannot vote yet. You need to wait {years_left} more years.")


# Dress for Weather
temperature = int(input("What is the temperature? \n"))

if temperature < 40:
    print("Wear a warm coat.")
elif temperature < 70:
    print("Wear a light jacket.")
elif temperature < 100:
    print("Wear something cool.")
else:
    air_conditioning = input("Do you have air conditioning at home? (yes/no) \n").lower()

    if air_conditioning == "yes":
        print("Stay at home.")
    else:
        print("Bummer, try a swimming pool.")
