import matplotlib.pyplot as plt
import pandas as pd

mypandas = pd.read_csv("consumables.csv")
mypandas.info()
# print(mypandas.head())

group = mypandas.groupby(["year"])
df1 = group.mean()
print(df1)

tea_series = df1["Tea, mate and spices"]

df1["Cocoa and cocoa preparations"] = df1["Cocoa and cocoa preparations "]
print(df1)

df1 = df1.drop(["Cocoa and cocoa preparations "], axis=1)
print(df1)

cocoa_series = df1["Cocoa and cocoa preparations"]
coffee_series = df1["Coffee, roasted or unroasted, decaf"]

plt.plot(tea_series, marker="^", label=tea_series.name)
plt.plot(cocoa_series, marker="o", label=cocoa_series.name)
plt.plot(coffee_series, marker="<", label=cocoa_series.name)

ax = plt.gca()
plt.title("Coffee, Tea, and Cocoa\nMonthly Averages by Year")
ax.set_xlabel("Year")
ax.set_ylabel("Exported pounds (millions)")
plt.legend()
plt.show()
