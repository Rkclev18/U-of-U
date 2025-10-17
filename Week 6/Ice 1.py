# 1. Name function (5 points)
def full_name(first_name, last_name, middle_initial):
    # Capitalizing the first letter of each name and formatting
    return "{} {}. {}".format(first_name.title(), middle_initial.upper(), last_name.title())


print(full_name("john", "doe", "a"))

# 2. String function practice (5 points)


print("Welcome to O'Neil's Boat Rentals!")


sentence = "Hello there! How are you? I'm doing fine."
print("Hello there!\nHow are you?\nI'm doing fine.")


hello_python = "hello python"
print(hello_python.upper())

while True:
    age = input("Please enter your age: ")
    if age.isdecimal():
        print("Thank you for entering a valid age.")
        break
    else:
        print("Please enter a whole number.")


first_name = "John"
last_name = "Doe"
full_name = f"*{first_name} {last_name}*"
print(full_name.center(25, '*'))
