<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Tables\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('admins.books.index', [
            'books' => Book::class,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admins.books.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi permintaan formulir sesuai kebutuhan
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => '',
            'synopsis' => '',
            'isbn' => '',
            'publication_year' => 'integer|nullable', // Tambahkan validasi bahwa publication_year harus berupa integer atau boleh kosong (nullable)
            'category_id' => 'required|array', // Pastikan input kategori berupa array
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'file|mimes:pdf',
        ]);

        $book = new Book;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'img' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('book-cover'), $imageName);
            $book->image_url = $imageName;
        } else {
            $book->image_url = 'Null';
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = 'book' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('book-pdf'), $pdfName);
            $book->pdf_url = $pdfName;
        } else {
            $book->pdf_url = 'Null';
        }

        // Simpan buku ke database
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->synopsis = $validatedData['synopsis'];
        $book->category_id = implode(',', $validatedData['category_id']); // Mengubah array menjadi string dipisahkan koma
        $book->publisher = $validatedData['publisher'];
        $book->isbn = $validatedData['isbn'];
        $book->publication_year = $validatedData['publication_year'];
        $book->save();

        return redirect('/books')->with('success', 'Book has been created successfully.');
    }

    // Metode edit(), update(), dan destroy() tetap belum diimplementasikan
    // Anda dapat mengisinya sesuai kebutuhan di kemudian hari.

    public function show(Book $book)
    {
        // ...
    }

    public function edit(Book $book)
    {
        // ...
    }

    public function update(Request $request, Book $book)
    {
        // ...
    }

    public function destroy(Book $book)
    {
        // ...
    }
}
