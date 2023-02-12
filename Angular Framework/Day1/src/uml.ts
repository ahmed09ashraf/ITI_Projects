
export class Account {
    Acc_no !: string ;
    Balance!: number;

    debitAmount():number{
        return 50 
    } ;
    creditAmount():number{
        return 60
    };
    getBalance():number{
        return this.Balance 
    }
    
}


export interface IAccount{
    Date_of_opening : Date ,
    addCustomer(): string,
    removeCustomer():string,
}


export class Current_Account extends Account  implements IAccount {
    constructor(public Date_of_opening: Date , public Interest_rate : number ){
        super();
    }
    addCustomer(): string{
        return "Successful add" ;
    };
    removeCustomer():string{
        return "Customer Removed" ;
    };

}

export class Saving_Account extends Account  implements IAccount {
    constructor(public Date_of_opening: Date , public Min_Balance : number  ){
        super();
    }
    addCustomer(): string{
        return "Successful add" ;
    };
    removeCustomer():string{
        return "Customer Removed" ;
    };


}

