# Problem 1.1 - Hello World (again)
def hello_world():
    name = input("What is your name? ")
    print(f"Hello, {name}")

# Problem 1.2 - Dog Years
def dog_years():
    dog_age = int(input("What is your dog's age? "))
    human_years_to_dog_years = dog_age * 7
    print(f"Your dog's age in dog years is: {human_years_to_dog_years}")

# Problem 1.3 - Purchase
def purchase():
    number_of_items = int(input("How many items would you like to purchase? "))
    print(f"You wish to purchase {number_of_items} items.")

# Uncomment the function you want to test
# hello_world()
# dog_years()
# purchase()
