# Week 3
# Code Along 2
my_list = ["Christine", "Jack", "Benny", "Renee", "Jerry"]
my_list.append("Jeff")
print(my_list)

del my_list[1]
print(my_list)
item = my_list.pop(1)
print(my_list)
print(item)
my_list.reverse()
print(my_list)
location = my_list.index("Jeff")
print(location)

prices = [3.99, 2.98, 1.99, 0.88, 0.99]
biggest_num = max(prices)
print(biggest_num)

smallest_num = min(prices)
print(smallest_num)
print(smallest_num, "up to", biggest_num)
prices.insert(1, 6.99)
prices.remove(0.99)
print(prices)
prices.sort()
print(prices)
prices.sort(reverse=True)
print(prices)

