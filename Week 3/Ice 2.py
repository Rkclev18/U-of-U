# 2.1. Shapes
shapes = ['rectangle', 'circle']
print("Original shapes list:", shapes)

# Append
shapes.append('triangle')
print("After appending triangle:", shapes)

# Insert
shapes.insert(1, 'square')
print("After inserting square:", shapes)

# Remove
shapes.remove('rectangle')
print("After removing rectangle:", shapes)

# Delete
del shapes[2]
print("After deleting element at index 2:", shapes)

# 2.2. Sorting
ages = [27, 60, 14, 35, 3, 76]
ages.sort()
print("Sorted ages:", ages)

names = ['Quinn', 'John', 'Amber', 'Kim']
names.sort()
print("Sorted names:", names)

stats = [[3, 2], [1, 2], [1, 1], [3, 1]]
stats.sort()
print("Sorted stats:", stats)

# 2.3. Min-Max
numbers = list(range(1, 21))
print("Minimum number:", min(numbers))
print("Maximum number:", max(numbers))
print("Sum of numbers:", sum(numbers))