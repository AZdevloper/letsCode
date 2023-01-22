add_new_article.addEventListener("click", () => {
  formParent.innerHTML += `
                            <div class="m-2 p-3 bg-primary  bg-opacity-10 border border-info  rounded">
                                <div class="mb-3">
                                            <label for="" class="form-label">Title</label>
                                            <input type="text" class="form-control form-control-sm" name="title[]" id="" aria-describedby="helpId" placeholder="">
                                        </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">author</label>
                                    <input type="text" class="form-control form-control-sm" name="author[]" id="" aria-describedby="helpId" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">category</label>
                                    <select class="form-select form-select-lg" name="category_id[]" id="">
                                        <option value="1">Blockchain</option>
                                        <option value="2">Cyber Security</option>
                                        <option value="3">Quantum Computing</option>
                                        <option value="4">Internet of Things (IoT)</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">content</label>
                                    <textarea class="form-control" name='content[]' rows="2" id="task-description" required></textarea>
                                </div>
                            </div>`;
});
alert("add");

