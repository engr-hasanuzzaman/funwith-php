import { Entity } from "@/interfaces/entity";

export class Product implements Entity {
    id: number;
    name: string;
    description: string;
    image: string;

    constructor(id = 0, name = '', description = '', image = '') {
        this.id = id;
        this.name =  name;
        this.description =  description;
        this.image =  image;
    }
    
}