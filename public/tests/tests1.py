import requests
import pprint
import json

def test_getOrderPriceByOHLCV():
    api_base_url = 'http://localhost:9999/api/'

    ohlcv = [
                {"time": "2022-05-01T15:23:00", "open": 0.072862, "close": 0.072877, "low": 0.072856, "high": 0.072954},
                {"time": "2022-05-01T15:24:00", "open": 0.072877, "close": 0.07291, "low": 0.072865, "high": 0.072924},
                {"time": "2022-05-01T15:25:00", "open": 0.07291, "close": 0.072931, "low": 0.07291, "high": 0.072997},
                {"time": "2022-05-01T15:26:00", "open": 0.072931, "close": 0.072999, "low": 0.072898, "high": 0.073},
                {"time": "2022-05-01T15:27:00", "open": 0.073, "close": 0.072969, "low": 0.072969, "high": 0.073},
                {"time": "2022-05-01T15:28:00", "open": 0.072969, "close": 0.073056, "low": 0.072968, "high": 0.073059}
            ]


    #преобразовываем список словарей в список списков
    correct_ohlcv = []
    for i in ohlcv:
        correct_ohlcv.append(list(i.values()))
    print(f"correct_ohlcv: {correct_ohlcv}")

    #преобразовываем список списков в json
    ohlcv_json = json.dumps(correct_ohlcv)
    print(f"ohlcv_json: {ohlcv_json}")

    #отправляем все это дело
    d1 = {'ohlcv': ohlcv_json, 'priceMinusPerc': 80}
    r1 = requests.post(api_base_url+'getOrderPriceByOHLCV.php', data=d1)
    print(f"response_json: {r1.json()}")

test_getOrderPriceByOHLCV()
