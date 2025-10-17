#Week 3
# code along 1 - basic lists
# intro to data structure

empty_list = list()

my_list = [95, 3.2, "Marvel", 17, -4]
print(my_list)
print(my_list[2])

second_list = [100, 101]
print("second list", second_list)
second_list = second_list * 2
print(second_list)

big_list = my_list + second_list
print("big list", big_list)

characters = ["Iron man", "Ant man", "Thor", "Loki", "Black Panther", "Black Widow"]
print(characters)
print(len(characters))
print(characters[2]) #thor
print(characters[1:3]) #ant man, thor
print(characters[1:5]) #all but black panther
print(characters[-3:])
print(characters[::3]) #iron man, loki
print(characters[2][-1]) #r