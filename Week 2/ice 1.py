# Grocery Budget Tracker

fruits = float(input("Enter the cost of fruits: \n$"))
vegetables = float(input("Enter the cost of vegetables: \n$"))
meats = float(input("Enter the cost of meats: \n$"))
dairy = float(input("Enter the cost of dairy products: \n$"))

total_cost = fruits + vegetables + meats + dairy

print(f"Your total grocery bill is: ${total_cost:.2f}")


# Book Purchase in Euros

price_in_euros = float(input("Enter the price of a book in Euros (€): \n€"))
number_of_books = int(input("Enter the number of books you want to purchase: \n"))

exchange_rate = 1.08

total_cost_usd = price_in_euros * number_of_books * exchange_rate

print(f"The total cost in US dollars is: ${total_cost_usd:.2f}")
