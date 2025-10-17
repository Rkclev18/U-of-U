import csv
import json

def change_pct(value):
    rpct = value.replace("%", "")

    fltval = float(rpct)/100
    fltval = format(fltval, ".3f")
    return fltval

def alter_values(item):
    if item["ValueType"] == "Percent":
        item["Value"] = change_pct(item["Value"])
    elif item["ValueType"] == "Number":
        item["Value"] = item["Value"].replace(",", "")

    return item


def process_stations(stationdata):
    out_file = open("outputfile.csv", "w")
    fnames = stationdata[0].keys()
    csvwriter = csv.DictWriter(out_file, fieldnames=fnames)

    for station in stationdata:
        astation = alter_values(station)
        csvwriter.writerow(astation)

def main():
    ffile = open("station-data.json", "r")
    stations = json.loads(ffile.read())
    process_stations(stations)
    print("Completed")


if __name__ == "__main__":
    main()