import { Entity } from "@/interfaces/entity";

export class Product implements Entity {
    id: number;
    title: string;
    description: string;
    image_url: string;
    price: number;

    constructor({id = 0, title = '', description = '', image_url = '', price = 0}) {
        this.id = id;
        this.title = title;
        this.description = description;
        this.image_url = image_url;
        this.price = price;
    }
}