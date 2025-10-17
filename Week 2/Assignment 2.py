# Exercise 2.1: Coin Identifier
coin_value = int(input("Enter a coin value: \n"))

if coin_value == 1:
    print("That's a penny!")
elif coin_value == 5:
    print("That's a nickel!")
elif coin_value == 10:
    print("That's a dime!")
elif coin_value == 25:
    print("That's a quarter!")
elif coin_value == 50:
    print("That's a half dollar!")
else:
    print("That's not a valid coin!")

# Exercise 2.2: Multiple Check
number = int(input("Enter an integer: \n"))

if number % 4 == 0 and number % 3 == 0:
    print("It's a multiple of both 4 and 3!")
elif number % 4 == 0:
    print("It's a multiple of 4!")
elif number % 3 == 0:
    print("It's a multiple of 3!")
else:
    print("It's neither a multiple of 4 nor 3.")

# Exercise 2.3: Age Discount
age = int(input("Enter your age: \n"))

if age < 0:
    print("Invalid input, age must be positive!")
elif age >= 65:
    discount = 0.30
    print("You are eligible for a 30% discount!")
elif age < 18:
    discount = 0.15
    print("You are eligible for a 15% discount!")
else:
    print("YOu are not eligible for a discount")

# Exercise 2.4: Even or Odd Range
start = int(input("Enter the starting number: \n"))
end = int(input("Enter the ending number: \n"))
even_or_odd = input("Enter 'even' or 'odd': \n").lower()

if even_or_odd == "even":
    for num in range(start, end + 1):
        if num % 2 == 0:
            print(num)
elif even_or_odd == "odd":
    for num in range(start, end + 1):
        if num % 2 != 0:
            print(num)
else:
    print("Invalid input. Please enter 'even' or 'odd'.")

# Exercise 2.5: Total Cost of Products
num_products = int(input("Enter the number of products: \n"))
total_cost = 0

for i in range(1, num_products + 1):
    price = float(input(f"Enter price for product # {i}: \n"))
    total_cost += price

print(f"Total cost: ${total_cost:.2f}")

# Exercise 2.6: Discounted Book Prices
while True:
    price = float(input("Enter the price of the book: \n$"))
    discount_price = price * 0.90
    print(f"Discounted price: ${discount_price:.2f}")

    more_books = input("Do you want to enter another price? (yes/no): \n").lower()
    if more_books != "yes":
        break

# Exercise 2.7: Calculate Total Saved and Total Spent
total_saved = 0
total_spent = 0

while True:
    price = float(input("Enter the price of the book: \n$"))
    discount_price = price * 0.90  # Apply 10% discount
    saved = price - discount_price

    total_saved += saved
    total_spent += discount_price

    print(f"Discounted price: ${discount_price:.2f}")
    print(f"You saved: ${saved:.2f}")

    more_books = input("Do you want to enter another price? (yes/no): \n").lower()
    if more_books != "yes":
        break

print(f"Total saved: ${total_saved:.2f}")
print(f"Total spent: ${total_spent:.2f}")

# Exercise 2.8: Country Capital Guessing Game
capital = "Mexico City"
while True:
    guess = input("What is the capital of Mexico? \n")
    if guess.lower() == capital.lower():
        print("Correct!")
        break
    else:
        print("Incorrect! Try again.")

# Exercise 2.9: Random Addition Quiz
import random

num1 = random.randint(1, 10)
num2 = random.randint(1, 10)

while True:
    user_answer = int(input(f"What is {num1} + {num2}? \n"))
    if user_answer == num1 + num2:
        print("Correct!")
        break
    else:
        print("Incorrect, try again!")
