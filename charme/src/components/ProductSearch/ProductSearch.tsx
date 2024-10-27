import React, { useState } from "react";
import axios from "axios";
import { Product } from "../../types/Product";

const ProductSearch = () => {
  const [keyword, setKeyword] = useState("");
  const [products, setProducts] = useState<Product[]>([]);
  const [error, setError] = useState("");

  const handleSearch = async () => {
    try {
      const response = await axios.get(
        `http://localhost:8000/api/search-products?keyword=${keyword}`
      );
      setProducts(response.data);
      setError("");
    } catch (err) {
      setError("Error fetching products: " + err.message);
    }
  };

  return (
    <div>
      <input
        type="text"
        value={keyword}
        onChange={(e) => setKeyword(e.target.value)}
        placeholder="Search for products"
      />
      <button onClick={handleSearch}>Search</button>

      {error && <div>{error}</div>}

      <ul>
        {products.map((product) => (
          <div key={product.id}>
            <div>{product.name}</div>
            <div>
              <img src={product.image} alt="" />
            </div>
          </div>
        ))}
      </ul>
    </div>
  );
};

export default ProductSearch;
