"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Saving_Account = exports.Current_Account = exports.Account = void 0;
class Account {
    debitAmount() {
        return 50;
    }
    ;
    creditAmount() {
        return 60;
    }
    ;
    getBalance() {
        return this.Balance;
    }
}
exports.Account = Account;
class Current_Account extends Account {
}
exports.Current_Account = Current_Account;
class Saving_Account extends Account {
}
exports.Saving_Account = Saving_Account;
