class BaseMapHandler {
  Map<String, dynamic> dataMap;

  BaseMapHandler(this.dataMap);

  dynamic getValue(String key) {
    return dataMap[key];
  }
}

class ExtendedMapHandler extends BaseMapHandler {
  ExtendedMapHandler(Map<String, dynamic> newDataMap) : super(newDataMap);

  @override
  Map<String, dynamic> get dataMap => super.dataMap;

  @override
  set dataMap(Map<String, dynamic> newMap) {
    super.dataMap = newMap;
  }
}

void main() {
  var baseHandler = BaseMapHandler({'key1': 'value1', 'key2': 'value2'});
  print('Base Handler: ${baseHandler.getValue('key1')}'); // Saída: value1

  var extendedHandler =
      ExtendedMapHandler({'newKey1': 'newValue1', 'newKey2': 'newValue2'});
  print(
      'Extended Handler: ${extendedHandler.getValue('newKey1')}'); // Saída: newValue1
}
