import { Role } from './Role';

export class User {
    id: number;
    name: string;
    email: string;
    permissions: string[];
    role: Role;

    constructor(id = 0, name = '', email = '', role = new Role(), permissions = []) {
        this.id = id;
        this.name = name;
        this.permissions = permissions;
        this.email =  email;
        this.role = role;
    }
}