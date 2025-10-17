# Week 4
#Code Along 2

my_dict = {
    "name": "Thor",
    "age": 1500
}
print(my_dict)

example_dict = {
    "animals": ["Dogs", "Cats", "Fish"],
    "number": 1,
    "name": "Odin",
    "a_boolean": True,
    "another_dict": {
        "you could": "keep going",
        "like this": "forever"
    }
}

for key in example_dict:
    print(key)

for item in example_dict.items():
    print(item)

for v in example_dict.values():
    print(v)

a_dictionary = {"color": "Blue", "fruit": "apple", "pet": "dog"}
for key in a_dictionary:
    print(key, "->", a_dictionary[key])

states = {"AK": "Alaska", "AL": "Alabama", "HI": "Hawaii", "MS": "Mississippi","UT": "Utah"}

for item in states.items():
    print(type(item))
    print(item)

for k, v in states.items():
    print(k, v)

seasons = {
    "Fall": ["September", "October", "November"],
    "Spring": ["March", "April", "May"],
    "Summer": ["June", "July", "August"]
}

print(seasons)
winter_season = {"Winter": ["December", "January", "February"]}
seasons.update(winter_season)
print(seasons)

#Sets
small_primes = set()
small_primes.add(2)
small_primes.add(3)
small_primes.add(5)
print(small_primes)
small_primes.add(1)
print(small_primes)
print(3 in small_primes)
print(4 in small_primes)
print(4 not in small_primes)
small_primes.add(3)
print(small_primes)

#tuples
t = ("a", "b", "c", "e")
print(t)
print(type(t))

print(t.count("d"))

list_a = [1,2,3]
list_b = [2,3,4]

print(list(set(list_a)  & set(list_b)))