import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { FormsModule } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { TransactionService, Transaction } from '../../services/transaction.service';

@Component({
  selector: 'app-transaction-form',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule],
  templateUrl: './transaction-form.component.html',
  styleUrls: ['./transaction-form.component.css']
})
export class TransactionFormComponent {
  transacaoForm: FormGroup;
  transactionId: number | null = null;
  warningMessage: string = '';

  constructor(
    private fb: FormBuilder,
    private transactionService: TransactionService,
    private route: ActivatedRoute,
    private router: Router
  ) 
  {
    this.transacaoForm = this.fb.group({
      descricao: ['', Validators.required],
      data: ['', Validators.required],
      tipo: ['', Validators.required],
      categoria: ['', Validators.required],
      valor: ['', [Validators.required, Validators.min(0)]],
    });
  }
  
  ngOnInit(): void {
    // Verifica se existe um ID na rota
    this.route.paramMap.subscribe((params) => {
      const id = params.get('id');
      if (id) {
        this.transactionId = +id; // Converte o ID para número
        this.loadTransaction(this.transactionId); // Carrega os dados da transação
      }
    });
    this.transacaoForm.valueChanges.subscribe(() => {
      this.validateTransaction();
    });
  }

  validateTransaction(): void {
    const valor = this.transacaoForm.get('valor')?.value;
    const tipo = this.transacaoForm.get('tipo')?.value;
  
    if (valor < 0) {
      this.warningMessage =
        'Use apenas números positivos.';
    } else {
      this.warningMessage = '';
    }
  }

  isEditMode = false; // Define se está editando ou criando uma nova transação

  loadTransaction(id: number): void {
    this.transactionService.getTransactionById(id).subscribe(
      (transaction: Transaction) => {
        // Ajusta o valor para ser positivo ao carregar no formulário
        transaction.valor = Math.abs(transaction.valor);
  
        // Preenche o formulário com os dados da transação
        this.transacaoForm.patchValue(transaction);
      },
      (error) => {
        console.error('Erro ao carregar a transação', error);
      }
    );
  }
  

  saveTransaction(): void {
    if (this.warningMessage) {
      return; // Impede o envio se houver um aviso ativo
    }
  
    if (this.transacaoForm.valid) {
      const transactionData = this.transacaoForm.value;
  
      // Ajusta o valor baseado no tipo
      if (transactionData.tipo === 'despesa') {
        transactionData.valor = transactionData.valor; // Sempre negativo para despesas
      } else {
        transactionData.valor = Math.abs(transactionData.valor); // Sempre positivo para receitas
      }
  
      if (this.transactionId) {
        // Atualiza a transação existente
        this.transactionService.updateTransaction(this.transactionId, transactionData).subscribe({
          next: () => this.router.navigate(['/transactions']),
          error: (error) => console.error('Erro ao atualizar a transação', error),
        });
      } else {
        // Cria uma nova transação
        this.transactionService.createTransaction(transactionData).subscribe({
          next: () => this.router.navigate(['/transactions']),
          error: (error) => console.error('Erro ao criar a transação', error),
        });
      }
    }
  }

  cancel() {
    this.router.navigate(['/transactions']);
  }
}
