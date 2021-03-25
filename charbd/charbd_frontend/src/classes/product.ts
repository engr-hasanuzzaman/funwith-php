import { Entity } from "@/interfaces/entity";

export class Product implements Entity {
    id: number;
    title: string;
    description: string;
    image_url: string;

    constructor(id = 0, title = '', description = '', image = '') {
        this.id = id;
        this.title = title;
        this.description = description;
        this.image_url = image;
    }
    
}