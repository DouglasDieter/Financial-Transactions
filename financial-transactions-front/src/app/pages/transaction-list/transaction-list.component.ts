import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { TransactionService, Transaction } from './../../services/transaction.service'; // Importar o serviço

@Component({
  selector: 'app-transaction-list',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './transaction-list.component.html',
  styleUrl: './transaction-list.component.css'
})
export class TransactionListComponent implements OnInit {
  transactions: Transaction[] = [];
  showDeleteModal = false;
  transactionToDeleteId: number | null = null;

  constructor(private router: Router, private transactionService: TransactionService) {}

  ngOnInit(): void {
    this.loadTransactions();  // Carregar as transações ao inicializar o componente
  }

  loadTransactions(): void {
    this.transactionService.getTransactions().subscribe(
      (data: Transaction[]) => {
        console.log('Transações carregadas:', data);
        this.transactions = data;
      },
      (error) => {
        console.error('Erro ao carregar as transações:', error);
      }
    );
  }

  editTransaction(id: number) {
    console.log(`Editando transação: ${id}`);
    this.router.navigate([`/transactions/edit/${id}`]);  // Redireciona para o formulário de edição
  }

  confirmDelete(id: number) {
    this.transactionToDeleteId = id;  // Salva o ID da transação que será deletada
    this.showDeleteModal = true;      // Exibe o modal de confirmação
  }

  deleteTransaction() {
    if (this.transactionToDeleteId !== null) {
      this.transactionService.deleteTransaction(this.transactionToDeleteId).subscribe({
        next: () => {
          this.showDeleteModal = false;
          this.loadTransactions();  // Recarrega as transações após a exclusão
        },
        error: (err) => {
          console.error('Erro ao excluir a transação', err);
        }
      });
    }
  }

  cancelDelete() {
    this.showDeleteModal = false;  // Fecha o modal sem deletar a transação
  }

  createTransaction() {
    this.router.navigate(['/transactions/new']);  // Navega para a tela de cadastro de nova transação
  }
}
