import requests
import pprint
import json

def test_indicator_rsi():
    api_base_url = 'http://localhost:9999/api/'

    with open('data2_fixed.json') as f:
        ohlcv_json = json.load(f)

    print(f"тип данных в ohlcv_json: {type(ohlcv_json)}")
    ohlcv_json2 = json.dumps(ohlcv_json)
    print(f"тип данных в ohlcv_json2: {type(ohlcv_json2)}")


    #отправляем все это дело
    d1 = {'ohlcv': ohlcv_json2, 'period': 15}
    r1 = requests.post(api_base_url+'indicator_rsi.php', data=d1)
    print(f"response_json: {r1.json()}")

test_indicator_rsi()
