# 1.1 Creating and Modifying a List
sports = ["Soccer", "Basketball", "Tennis", "Baseball"]
print("Original sports list:", sports)


sports.append("Hockey")

sports.remove("Tennis")
print("Updated sports list:", sports)

# 1.2 Copying and Modifying Lists
desserts = ["Cake", "Ice Cream", "Brownie", "Donut", "Pie"]
print("Original desserts list:", desserts)


desserts_copy = desserts[:]


desserts.append("Pudding")

desserts_copy.remove("Brownie")

print("Modified original desserts list:", desserts)
print("Modified copied desserts list:", desserts_copy)