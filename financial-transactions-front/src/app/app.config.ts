import { ApplicationConfig, NgModule, provideZoneChangeDetection } from '@angular/core';
import { provideHttpClient } from '@angular/common/http';
import { provideAnimationsAsync } from '@angular/platform-browser/animations/async';
import { Routes } from '@angular/router';
import { TransactionListComponent } from './pages/transaction-list/transaction-list.component';
import { TransactionFormComponent } from './pages/transaction-form/transaction-form.component';
import { provideRouter, Route } from '@angular/router';

export class AppModule {}

export const routes: Routes = [
  { path: '', component: TransactionListComponent },
  { path: 'transactions', component: TransactionListComponent },
  { path: 'transactions/new', component: TransactionFormComponent },
  { path: 'transactions/edit/:id', component: TransactionFormComponent },
];

export const appConfig: ApplicationConfig = {
  providers: [provideZoneChangeDetection({ eventCoalescing: true }), provideAnimationsAsync(), provideRouter(routes),provideHttpClient()]
};
