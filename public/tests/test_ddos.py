#import tests
import tests2
import time

def ddos():
    count = 0
    while count < 1:
        print(f"итерация № {count}")
        tests2.test_getOrderPriceByOHLCV()
        count +=1

def ddos2():
    count = 0
    while count < 20:
        print(f"итерация № {count}")
        tests.test_getOrderPriceByOHLCV()
        time.sleep(7)
        count +=1

t = ddos()
