class ContaBancaria {
  String _dono;
  double _saldo = 0.0;

  ContaBancaria(this._dono, this._saldo);

  // Método para depositar dinheiro
  void depositar(double valor) {
    if (valor > 0) {
      _saldo += valor;
      print('Depósito de R\$ $valor efetuado com sucesso!');
    } else {
      print('O valor do depósito deve ser positivo.');
    }
  }

  // Método para sacar dinheiro
  bool sacar(double valor) {
    if (valor > 0 && valor <= _saldo) {
      _saldo -= valor;
      print('Saque de R\$ $valor realizado com sucesso!');
      return true;
    } else {
      print('Saque inválido. Verifique o valor e o saldo disponível.');
      return false;
    }
  }

  // Método para verificar o saldo (exemplo de método getter)
  double get saldo => _saldo;

  // Método para obter o nome do dono da conta
  String get dono => _dono;
}

void main() {
  var minhaConta = ContaBancaria('João Silva', 1000.00);
  print('Saldo inicial: R\$ ${minhaConta.saldo}');
  minhaConta.depositar(200.00);
  minhaConta.sacar(150.00);
  print('Saldo final: R\$ ${minhaConta.saldo}');
}
