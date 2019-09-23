<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $tasks = Task::UserTasks($id)->get();
        return compact('tasks', 'id');
        // $books = Book::UserBooks($id)->get();
        // $main_title = 'Your books';
        // return view('books.index', compact('books', 'id', 'main_title'));
    }

    public function show($id)
    {

    }

    public function create()
    {
    	$id = Auth::user()->id;
        $main_title = 'Add new book';
    	return view('books.create', compact('id', 'main_title'));

    }



    public function store()
    {
       	$this->validate(request(), [
       			'title' 		=> 'required|min:2|max:100|unique:books|string',
       			'description' 	=> 'required|min:50|max:1000|unique:books|string'
       		]);

       	$book = new Book();

        $book->title = request('title');
        $book->description = request('description');
        $book->author_id = request('author_id');

        // if(request('comedy')==null || request('comedy')=='') { $book->comedy = 0; } else { $book->comedy = 1; }
        // if(request('fantasy')==null) { $book->fantasy = 0; } else { $book->fantasy = 1; }
        // if(request('for_kids')==null) { $book->for_kids = 0; } else { $book->for_kids = 1; }
        // if(request('history')==null) { $book->history = 0; } else { $book->history = 1; }
        // if(request('moral')==null) { $book->moral = 0; } else { $book->moral = 1; }
        // if(request('philosophy')==null) { $book->philosophy = 0; } else { $book->philosophy = 1; }
        // if(request('religious')==null) { $book->religious = 0; } else { $book->religious = 1; }
        // if(request('report')==null) { $book->report = 0; } else { $book->report = 1; }
        // if(request('romance')==null) { $book->romance = 0; } else { $book->romance = 1; }
        // if(request('thriller')==null) { $book->thriller = 0; } else { $book->thriller = 1; }
        // if(request('youth')==null) { $book->youth = 0; } else { $book->youth = 1; }

        $book->comedy   =   request('comedy');
        $book->fantasy  =   request('fantasy');
        $book->for_kids =   request('for_kids');
        $book->history  =   request('history');
        $book->moral    =   request('moral');
        $book->philosophy = request('philosophy');
        $book->religious =  request('religious');
        $book->report   =   request('report');
        $book->romance  =   request('romance');
        $book->thriller =   request('thriller');
        $book->youth    =   request('youth');

       	$book->save();
        // flash('Book added')->success();
      	// return redirect('/books');
    }

    public function edit($id)
    {
        $author_id = Auth::user()->id;
        $book = Book::find($id);
        $main_title = 'Edit "'.$book->title . '"';

        // counting title lengt and deciding what color to the view
        $title_red = false;
        $title_green = false;
        if(strlen($book->title) >=100){
            $title_red = true;
        } else {
            $title_green = true;
        }

        // counting description length and deciding what color to the view
        $desc_red = false;
        $desc_green = false;
        if(strlen($book->description) >=1000){
            $desc_red = true;
        } else {
            $desc_green = true;
        }

        // counting cathegories length and deciding what color to the view
        $cathegory_counter = 0;
        $cat_red = false;
        $cat_green = false;
        if($book->comedy == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->fantasy == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->for_kids == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->history == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->moral == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->philosophy == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->religious == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->report == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->romance == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->thriller == 1) { $cathegory_counter=$cathegory_counter+1;}
        if($book->youth == 1) { $cathegory_counter=$cathegory_counter+1;}

        if($cathegory_counter == 3){
            $cat_red = true;
        } else {
            $cat_green = true;
        }



        if($author_id === $book->author_id)
        {
            return view('books.edit', compact('book', 'author_id', 'main_title', 'title_green', 'title_red', 'desc_green', 'desc_red', 'cathegory_counter', 'cat_red', 'cat_green'));
        } else
        {

        }
    }

    public function update($id)
    {

        $this->validate(request(), [
                'title'         => 'min:2|max:100|string|required',
                'description'   => 'min:50|max:1000|string|required'
            ]);

        $book = Book::findOrFail($id);
        if($book->title != request('title'))
        {
            if(Book::find(request('title')) === 0)
            {
                $book->title = request('title');
            } else {

            }
        }

        $book->title = request('title');
        $book->description = request('description');
        $book->author_id = request('author_id');

        $book->comedy   =   request('comedy');
        $book->fantasy  =   request('fantasy');
        $book->for_kids =   request('for_kids');
        $book->history  =   request('history');
        $book->moral    =   request('moral');
        $book->philosophy = request('philosophy');
        $book->religious =  request('religious');
        $book->report   =   request('report');
        $book->romance  =   request('romance');
        $book->thriller =   request('thriller');
        $book->youth    =   request('youth');

        $book->save();

        //return redirect('/books');

    }
}
