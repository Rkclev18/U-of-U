from functions import fahrenheit_to_celsius, celsius_to_fahrenheit

fahrenheit_value = 100
celsius_value = 37.78

print(f"{fahrenheit_value}°F is {fahrenheit_to_celsius(fahrenheit_value):.2f}°C")

print(f"{celsius_value}°C is {celsius_to_fahrenheit(celsius_value):.2f}°F")


from functions import NullToBooleanConverter

non_null_value = "Hello"
null_value = None


print(f"Non-null value: {NullToBooleanConverter(non_null_value)}")
print(f"Null value: {NullToBooleanConverter(null_value)}")


from functions import getAnswer
import random

random_number = random.randint(1, 9)

print(f"Your magic 8-ball response: {getAnswer(random_number)}")
