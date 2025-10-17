# 4.1 Split Number List
num_string1 = '10 67 123 46 20 18 36 250'
num_list1 = num_string1.split()
print(num_list1)

num_string2 = '10,67,123,46,20,18,36,250'
num_list2 = num_string2.split(',')
print(num_list2)

# 4.2 Split Data into List and Sum
data_string = '90,67,87,102,77,80'
data_list = data_string.split(',')
sum_of_numbers = sum(map(int, data_list))
print(sum_of_numbers)

# 4.3 Slice Lists
numbers = [1,2,3,4,5,6,7,8,9]
first_four_numbers = numbers[:4]
print(first_four_numbers)

# 4.4 Slice Lists with Increment
letters = ['a','b','c','d','e','f','g']
every_other_letter = letters[::2]
print(every_other_letter)
