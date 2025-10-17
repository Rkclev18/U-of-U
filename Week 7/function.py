# function.py

# Yes -> Y, No -> N, Male -> M, Female -> F
# Y y N n
# Released - R, Hold - H, Deleted - D, Pending - P

def yesNoBooleanCoverter(val):
    val = str(val).upper()
    if val == "Y" or val == "Yes":
        return True
    else:
        return False

def booleanYesNoConverter(val):
    if val:
        return "Yes"

    return "No"

# null
def nullToBooleanConverter(value):
    return value != None

def moveQueueValueConverter(val):
    # R, H, D, P
    val = str(val).upper()
    if val == "R":
        return  "Released"
    elif val == "H":
        return "Hold"
    elif val == "D":
        return "Deleted"
    elif val == "P":
        return "Pending"
    else: return None