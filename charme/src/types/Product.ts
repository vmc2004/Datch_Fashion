export type Product = {
  id: string;
  name: string;
  quantity: number;
  image: string;
  description: string;
};

export type ProductInputs = Omit<Product, "id">;
