# 1. Divide by zero exception (5 points)
def divide_numbers(num1, num2):
    try:
        result = num1 / num2
        return result
    except ZeroDivisionError:
        print("Invalid argument")
        return None


print(divide_numbers(10, 2))
print(divide_numbers(10, 0))

# 2. Basic exception handling (5 points)

try:
    for i in ['a', 'b', 'c']:
        print(i ** 2)
except TypeError as e:
    print(f"An error occurred: {e}")

# 3. try-except-finally (5 points)

try:
    x = 5
    y = 0
    z = x / y
except ZeroDivisionError:
    print("Cannot divide by zero!")
finally:
    print("All Done.")

# 4. try-except-else (5 points)

def get_square():
    while True:
        try:
            user_input = input("Input an integer: ")
            number = int(user_input)
        except ValueError:
            print("An error occurred! Please try again!")
        else:
            print(f"Thank you, your number squared is: {number ** 2}")
            break


get_square()
