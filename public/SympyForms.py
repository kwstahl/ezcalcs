import sympy
import json
import collections

"""Formula Class:

A class that takes in a JSON string of variables, and their unit conversions and other information as 1st argument, and their corresponding 
formula as a string as the second argument.
The variables are passed in through sys.argv[1], and formula through sys.argv[2]

On initialization the following properties are created:

-variable_array: an array created from the JSON string sys.argv[1]
    -"sympy_symbol" is appended to the array and and is sympy.Symbol object, same name as variable name
-formula_string: the formula string 
-sympy_equation: formula string converted to type sympy.Eq (the equation class)
-variable_to_solve_for: property created in substitute_converted_values()
-converted_answer: the variable solved for and converted 

Available methods:

-generate_value_tuples(): generator function that returns a named tuple with the following: variable_name, value, sympy_symbol, unit_conversion.
    easier to use these named tuples in many loops where the name of the value is useful for readability.

-substitute_converted_values(): this function takes in the sympy_equation and substitutes in the converted values,
    generates the variable_to_solve_for property

-solve_for_variable(): solves for the missing variable, must first have substitute_converted_values(): performed.


"""

#named tuple to be used by generator iterate_variables(). 
Variable = collections.namedtuple("Variable", ["variable_name", "Value", "sympy_symbol", "unit_conversion"])

class Formula:
    def __init__(self, json_variable_array, formula_string):

        #turn json to dictionary from sys.argv[1]
        self.variable_array = json.loads(json_variable_array)

        #create and append sympy symbols
        for variable_name in self.variable_array:
            self.variable_array[variable_name]["sympy_symbol"] = sympy.Symbol(variable_name)
        
        #formula string comes from sys.argv[2]
        self.formula_string = formula_string
        self.sympy_equation = sympy.sympify(self.formula_string)

<<<<<<< Updated upstream:public/SympyForms.py
<<<<<<< Updated upstream:public/SympyForms.py
        #created during substitute_values() if "" found on "Value"
=======
        #created during substitute_converted_values() if "none" found on "Value"
>>>>>>> Stashed changes:SympyForms.py
=======
        #created during substitute_converted_values() if "none" found on "Value"
>>>>>>> Stashed changes:SympyForms.py
        self.variable_to_solve_for = ""

        #created during solve_for_variable()
        self.converted_answer = ""

    def generate_value_symbol_tuples(self):
        #generator function that creates named tuples for use in loops
        for variable_name in self.variable_array:
            variable_value = self.variable_array[variable_name]["Value"]
            sympy_symbol = self.variable_array[variable_name]["sympy_symbol"]
            unit_conversion = self.variable_array[variable_name]["unit_conversion"]
            yield Variable(variable_name, variable_value, sympy_symbol, unit_conversion)


    def substitute_converted_values(self):
        #define the variable array, sympy equation from init for readability
        sympy_equation = self.sympy_equation
        for variable_name, variable_value, sympy_symbol, unit_conversion in self.generate_value_symbol_tuples():
            #loop through variable array and multiply values by conversion factors then substitute variables with this value
            if variable_value != "":
                float(unit_conversion)
                converted_variable_value = float(variable_value)*float(unit_conversion)
                sympy_equation = sympy_equation.subs(sympy_symbol, converted_variable_value)
            else:
                self.variable_to_solve_for = Variable(variable_name, variable_value, sympy_symbol, unit_conversion)
        self.sympy_equation = sympy_equation


    def solve_for_variable(self):
        unit_conversion = self.variable_to_solve_for.unit_conversion
        equation = sympy.Eq(self.sympy_equation, 0)
        variable_to_solve_for = self.variable_to_solve_for.sympy_symbol

        #solve for missing variable, then divide by the unit conversion factor
<<<<<<< Updated upstream:public/SympyForms.py
<<<<<<< Updated upstream:public/SympyForms.py
        self.converted_answer = sympy.solve(equation, variable_to_solve_for)[0]*(unit_conversion)
=======
        self.converted_answer = sympy.solve(equation, variable_to_solve_for)[0]*(1/unit_conversion)

>>>>>>> Stashed changes:SympyForms.py
=======
        self.converted_answer = sympy.solve(equation, variable_to_solve_for)[0]*(1/unit_conversion)

>>>>>>> Stashed changes:SympyForms.py
