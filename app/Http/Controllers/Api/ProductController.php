<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

/**
 * Get All Products
 * 
 * Menampilkan semua data produk yang tersedia dalam database
 */

    // GET /products
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }

/**
 * Get Product Detail
 * 
 * Menampilkan detail satu produk berdasarkan ID
 */

    // GET /products/{id}
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

/**
 * Create Product
 * 
 * Menambahkan data produk baru ke dalam database
 */

    //POST /products
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Product berhasil ditambahkan',
            'data' => $product
        ]);
    }

/**
 * Update Product
 * 
 * Memperbarui data produk berdasarkan ID
 */

    // PUT /products/{id}
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product berhasil diupdate',
            'data' => $product
        ]);
    }

/**
 * Delete Product
 * 
 * Menghapus data produk berdasarkan ID
 */

    // DELETE /products/{id}
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product berhasil dihapus'
        ]);
    }
}
