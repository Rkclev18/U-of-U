# Problem 2.1 - Sum of numbers
def sum_of_numbers(numbers):
    return sum(numbers)

# Problem 2.2 - Number power
def number_power(base, exponent):
    return base ** exponent

# Problem 2.3 - Tax function
def calculate_tax(price):
    tax_rate = 0.07
    return price * (1 + tax_rate)

# Problem 2.4 - Average function
def average_of_numbers(num1, num2, num3):
    return (num1 + num2 + num3) / 3


if __name__ == "__main__":
    # Problem 2.1 - Sum of numbers
    numbers = [10, 20, 30, 40]
    print(f"Sum of numbers: {sum_of_numbers(numbers)}")

    # Problem 2.2 - Number power
    base = 2
    exponent = 3
    print(f"{base} raised to the power of {exponent} is: {number_power(base, exponent)}")

    # Problem 2.3 - Tax function
    price = 100
    print(f"Price after tax: {calculate_tax(price)}")

    # Problem 2.4 - Average function
    num1, num2, num3 = 10, 20, 30
    print(f"The average is: {average_of_numbers(num1, num2, num3)}")
